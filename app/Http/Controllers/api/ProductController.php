<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use function DeepCopy\deep_copy;

/**
 * @group Product Actions
 */

class ProductController extends Controller
{
    public function __construct(private Product $product, private ProductAudit $productAudit)
    {
    }

    /**
     * Get all products with paginate
     * @authenticated
     * @queryParam search string
     */
    public function getProducts()
    {
        $search = request('search', '');
        $products = $this->product::where('active', true)
            ->where('title', 'like', "%$search%")
            ->paginate(env('PG '));
        return ProductResource::collection($products);
    }
    /**
     * Create new product
     * @authenticated
     */
    public function createNewProduct(ProductRequest $request)
    {
        if (!Gate::allows('admin'))
            return response()->json(['message' => ['error' => ['forbidden']]], 403);
        $request->validated();
        $this->product::create([
            'title' => $request->title,
            'price' => $request->price,
            'amount' => $request->amount
        ]);
        return response()->json(['message' => 'Product added'], 201);
    }

    /**
     * Update product data
     * @authenticated
     */
    public function updateProduct(ProductRequest $request, int $id)
    {
        if (!Gate::allows('admin'))
            return response()->json(['message' => ['error' => ['forbidden']]], 403);
        DB::beginTransaction();
        try {
            $product = $this->product::find($id);
            $clone = deep_copy($product);
            $product->update([
                'title' => $request->title,
                'price' => $request->price,
                'amount' => $request->amount
            ]);
            $this->log($clone, $product, 'add');
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error',
                'error' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ], 500);
        }
        return response()->json(['message' => 'Product updated'], 201);
    }

    /**
     * Delete product
     * @authenticated
     */
    public function deleteProduct(int $id)
    {
        $product = $this->product::find($id);
        DB::beginTransaction();
        try {
            $this->log($product, $product);
            $product->update([
                'active' => false
            ]);
            DB::commit();
            return response()->json(['message' => 'Product Deleted'], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error',
                'error' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ], 500);
        }
    }

    private function log($oldData, $newData, $action = 'delete')
    {
        try {
            $this->productAudit::create([
                'old_title' => $oldData->title,
                'new_title' => $newData->title,
                'old_price' => $oldData->price,
                'new_price' => $newData->price,
                'old_amount' => $oldData->amount,
                'new_amount' => $newData->amount,
                'product_id' => $oldData->id,
                'user_id' => auth()->id(),
                'date' => date('Y-m-d'),
                'action' => $action
            ]);
            return response()->json(['message' => 'ok'], 200);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), 500);
        }
    }
}
