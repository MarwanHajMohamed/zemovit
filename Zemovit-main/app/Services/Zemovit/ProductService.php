<?php

namespace App\Services\Zemovit;

use App\Models\ProductTherapeuticArea;
use App\Models\Zemovit\ProductBenefit;
use App\Models\Zemovit\ProductBenefitTranslation;
use App\Models\Zemovit\ProductDetail;
use App\Models\Zemovit\ProductDetailTranslation;
use App\Repositories\Zemovit\ProductRepository;
use App\Repositories\Zemovit\ProductWarningRepository;
use App\Services\MainService;

class ProductService extends MainService
{
    public function __construct(
        private ProductRepository $repository,
        private ProductWarningRepository $productWarningRepository,
    )
    {

    }
    public function getDataTable()
    {
        return $this->repository->getProductDataTable();
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }
    public function first()
    {
        return $this->repository->first();
    }
    public function getProductFeature()
    {
        return $this->repository->getFeaturedProduct();
    }
    public function storeProduct($data)
    {
        $therapeuticAreaIds = $data['therapeutic_area_id'];
        unset($data['therapeutic_area_id']);
        $product = $this->repository->store($data);
        if (!empty($therapeuticAreaIds) && is_array($therapeuticAreaIds)) {
            foreach ($therapeuticAreaIds as $therapeutic_area_id) {
                ProductTherapeuticArea::create([
                    'therapeutic_area_id' => $therapeutic_area_id,
                    'product_id' => $product->id,
                ]);
            }
        }
        // Handle Product Benefits
        if (isset($data['benefits']) && !empty(array_filter($data['benefits'], function ($item) {
                foreach (config('translatable.locales') as $locale) {
                    if (isset($item[$locale]['title']) && !empty($item[$locale]['title'])) {
                        return true;
                    }
                }
                return false;
            }))) {
            foreach ($data['benefits'] as $benefit) {
                $productBenefit = ProductBenefit::create([
                    'product_id' => $product->id,
                ]);
                foreach (config('translatable.locales') as $locale) {
                    ProductBenefitTranslation::create([
                        'locale' => $locale,
                        'product_benefit_id' => $productBenefit->id,
                        'title' => $benefit[$locale]['title'] ?? '',
                    ]);
                }
            }
        }
        // Handle Product Details
        if (isset($data['details']) && !empty(array_filter($data['details'], function ($item) {
                foreach (config('translatable.locales') as $locale) {
                    if (isset($item[$locale]['label']) && !empty($item[$locale]['label'])) {
                        return true;
                    }
                }
                return false;
            }))) {
            foreach ($data['details'] as $detail) {
                $productDetail = ProductDetail::create([
                    'product_id' => $product->id,
                ]);
                foreach (config('translatable.locales') as $locale) {
                    ProductDetailTranslation::create([
                        'locale' => $locale,
                        'product_detail_id' => $productDetail->id,
                        'label' => $detail[$locale]['label'] ?? '',
                        'value' => $detail[$locale]['value'] ?? '',
                    ]);
                }
            }
        }
        return $product;
    }

    public function updateProduct($productId, $data)
    {
        $therapeuticAreaIds = $data['therapeutic_area_id'] ?? [];
        unset($data['therapeutic_area_id']);
        $product = $this->repository->update($productId, $data);
        if (!empty($therapeuticAreaIds) && is_array($therapeuticAreaIds)) {
         $this->repository->find($productId)->therapeuticAreas()->sync($therapeuticAreaIds);
        }
        // andle Product Benefits
        if (isset($data['benefits']) && !empty(array_filter($data['benefits'], function ($item) {
                return !is_null($item['en']['title']);
            }))) {
            ProductBenefit::where('product_id', $productId)->delete();
            foreach ($data['benefits'] as $benefit) {
                $productBenefit = ProductBenefit::create([
                    'product_id' => $productId,
                ]);
                foreach (config('translatable.locales') as $locale) {
                    ProductBenefitTranslation::create([
                        'locale' => $locale,
                        'product_benefit_id' => $productBenefit->id,
                        'title' => $benefit[$locale]['title'] ?? '',
                    ]);
                }
            }
        }

        // Handle Product Details
        if (isset($data['details']) && !empty(array_filter($data['details'], function ($item) {
                return !is_null($item['en']['label']);
            }))) {
            ProductDetail::where('product_id', $productId)->delete();
            foreach ($data['details'] as $detail) {
                $productDetail = ProductDetail::create([
                    'product_id' => $productId,
                ]);
                foreach (config('translatable.locales') as $locale) {
                    ProductDetailTranslation::create([
                        'locale' => $locale,
                        'product_detail_id' => $productDetail->id,
                        'label' => $detail[$locale]['label'] ?? '',
                        'value' => $detail[$locale]['value'] ?? '',
                    ]);
                }
            }
        }

        return $product;
    }
}
