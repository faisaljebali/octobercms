<?php namespace Freelance\Service\Components;

use Lang;
use Auth;
use Mail;
use Event;
use Flash;
use Input;
use Request;
use Redirect;
use Validator;
use System\Models\File as File;
use ValidationException;
use ApplicationException;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\User\Models\Settings as UserSettings;
use RainLab\User\Models\User;
use Freelance\Service\Models\Service;
use Exception;

/**
 * Account component
 *
 * Allows users to register, sign in and update their account. They can also
 * deactivate their account and resend the account verification email.
 */
class AddContest extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Add Contest',
            'description' => 'Add Contest'
        ];
    }

    public function defineProperties()
    {
        return [
            
        ];
    }

    /**
     * Executed when this component is initialized
     */
    public function prepareVars()
    {
        $this->page['user'] = $this->user();
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {
        $this->prepareVars();
    }

    //
    // Properties
    //

    /**
     * Returns the logged in user, if available
     */
    public function user()
    {
        if (!Auth::check()) {
            return null;
        }

        return Auth::getUser();
    }

    


    public function onAddContest()
    {
        $data = post();
    
        $rules = [
            'logoname'     => 'required',
            'description'     => 'required',
            'category'    => 'required',
            //'password' => 'required|between:8,255|confirmed',
        ];

        $messages = [
            'description.required' =>"قم بإدخال وصف للعملك أو منتج",
            'logoname.required' =>"لم تدخل محتوى الشعار بعد",
            'category.required' => "ماذا تريد أن تصمم ؟",
        ];

        $validation = Validator::make($data, $rules, $messages);
        if ($validation->fails()) {
            throw new ValidationException($validation);
        }
    
        $service = new Service;
        $service->description = post('description');
        $service->titre = post('logoname');
        $service->slide_1 = post('slide_1');
        $service->slide_2 = post('slide_2');
        $service->slide_3 = post('slide_3');
        $service->slide_4 = post('slide_4');
        $service->more_info = post('more_info');
        $service->category = post('category');
        $service->user_id = $this->user()->id;
        $service->save();
    }

}
