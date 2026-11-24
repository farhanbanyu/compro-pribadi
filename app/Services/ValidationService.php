<?php

namespace App\Services;

use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;
use App\Services\Contracts\ValidationServiceInterface;
use Illuminate\Support\Facades\Auth;

class ValidationService implements ValidationServiceInterface
{
    function sliderCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function sliderUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function igPostCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function igPostUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }
    function teamCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function teamUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function partnerCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function partnerUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function portfolioCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function portfolioUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function layananCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function layananUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function galleryCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function galleryUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function superiorityCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function superiorityUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondSuperiorityCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondSuperiorityUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondServiceCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondServiceUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function moreServiceCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function moreServiceUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function blogCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function blogUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function productCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function productUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function fiturCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function fiturUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function categoryPortfolioCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function categoryPortfolioUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }
    function categoryBlogCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function categoryBlogUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function kindPortfolioCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function kindPortfolioUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function actionCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function actionUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function configUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }
    function heroUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file1' => 'image|max:2228',
            'file2' => 'image|max:2228',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function stepCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function stepUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }
    function packageCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function packageUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'title' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function testimonialCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function testimonialUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondTestimonialCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondTestimonialUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondFeatureCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondFeatureUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function bannerUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'max:10000'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function headlinesUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function aboutUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function secondbannerUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function thirdbannerUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'file' => 'image|max:2228'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function AuthorityCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'code' => 'required'
        ], [
            'code.required' => 'Wajib memilih fitur setidaknya 1'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function AuthorityUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'title' => 'required',
            'code' => 'required'
        ], [
            'code.required' => 'Wajib memilih fitur setidaknya 1'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }


    function UserStatus(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function UserCreate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'authorities_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:admin,email|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function UserUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'authorities_id' => 'required',
            'name' => 'required',
            'id' => 'required|numeric',
            'email' => 'required|email|unique:admin,email,' . $req->id,
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function UserPassword(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'password' => 'required|confirmed|min:8|max:30',
            'id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }


    function ProfileEdit(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:admin,email,' . Auth::id(),
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }

    function ProfilePassword(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'password' => 'required|confirmed|min:8|max:30',
            'curr_password' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first(), 422);
        }
    }
}
