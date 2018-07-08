<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:17
 */

namespace App\Repositories;
interface CategoriesRepositoryInterface extends BaseRepositoryInterface
{
    public function selectToArray();

    public function getSlug($slug);

    public function haveParentId($id);

    public function getCategoryChiled($id);

    public function getParentCategories();
}