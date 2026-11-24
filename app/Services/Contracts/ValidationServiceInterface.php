<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface ValidationServiceInterface
{
    function sliderCreate(Request $req);
    function sliderUpdate(Request $req);

    function packageCreate(Request $req);
    function packageUpdate(Request $req);

    function galleryCreate(Request $req);
    function galleryUpdate(Request $req);

    function layananCreate(Request $req);
    function layananUpdate(Request $req);

    function igPostCreate(Request $req);
    function igPostUpdate(Request $req);

    function teamCreate(Request $req);
    function teamUpdate(Request $req);

    function categoryPortfolioCreate(Request $req);
    function categoryPortfolioUpdate(Request $req);

    function categoryBlogCreate(Request $req);
    function categoryBlogUpdate(Request $req);

    function kindPortfolioCreate(Request $req);
    function kindPortfolioUpdate(Request $req);

    function secondServiceCreate(Request $req);
    function secondServiceUpdate(Request $req);

    function moreServiceCreate(Request $req);
    function moreServiceUpdate(Request $req);

    function heroUpdate(Request $req);
    function bannerUpdate(Request $req);
    function headlinesUpdate(Request $req);
    function secondbannerUpdate(Request $req);
    function thirdbannerUpdate(Request $req);

    function aboutUpdate(Request $req);
    function configUpdate(Request $req);

    function partnerCreate(Request $req);
    function partnerUpdate(Request $req);

    function portfolioCreate(Request $req);
    function portfolioUpdate(Request $req);

    function testimonialCreate(Request $req);
    function testimonialUpdate(Request $req);

    function secondTestimonialCreate(Request $req);
    function secondTestimonialUpdate(Request $req);

    function superiorityCreate(Request $req);
    function superiorityUpdate(Request $req);

    function actionCreate(Request $req);
    function actionUpdate(Request $req);

    function secondFeatureCreate(Request $req);
    function secondFeatureUpdate(Request $req);

    function productCreate(Request $req);
    function productUpdate(Request $req);

    function secondSuperiorityCreate(Request $req);
    function secondSuperiorityUpdate(Request $req);

    function fiturCreate(Request $req);
    function fiturUpdate(Request $req);

    function stepCreate(Request $req);
    function stepUpdate(Request $req);

    function blogCreate(Request $req);
    function blogUpdate(Request $req);

    function AuthorityCreate(Request $req);
    function AuthorityUpdate(Request $req);

    function UserStatus(Request $req);
    function UserCreate(Request $req);
    function UserUpdate(Request $req);
    function UserPassword(Request $req);

    function ProfileEdit(Request $req);
    function ProfilePassword(Request $req);
}
