<?php

namespace App\Http\Requests\Admin\doctors;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreDates extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'doctor_id' => 'required|exists:doctors,id',

            'saturday' => 'nullable|in:enable,disable',
            'saturday_from' => 'nullable|required_if:saturday,enable',
            'saturday_to' => 'nullable|required_if:saturday,enable',

            'sunday' => 'nullable|in:enable,disable',
            'sunday_from' => 'nullable|required_if:sunday,enable',
            'sunday_to' => 'nullable|required_if:sunday,enable',

            'monday' => 'nullable|in:enable,disable',
            'monday_from' => 'nullable|required_if:monday,enable',
            'monday_to' => 'nullable|required_if:monday,enable',

            'tuesday' => 'nullable|in:enable,disable',
            'tuesday_from' => 'nullable|required_if:tuesday,enable',
            'tuesday_to' => 'nullable|required_if:tuesday,enable',

            'wednesday' => 'nullable|in:enable,disable',
            'wednesday_from' => 'nullable|required_if:monday,enable',
            'wednesday_to' => 'nullable|required_if:monday,enable',

            'thursday' => 'nullable|in:enable,disable',
            'thursday_from' => 'nullable|required_if:monday,enable',
            'thursday_to' => 'nullable|required_if:monday,enable',

            'friday' => 'nullable|in:enable,disable',
            'friday_from' => 'nullable|required_if:monday,enable',
            'friday_to' => 'nullable|required_if:monday,enable',



        ];
    }
    public function messages()
    {
        return [
            'saturday_from.required_if' => __('dashboard.the_start_date_is_required_if_available_on_saturday'),
            'saturday_to.required_if' => __('dashboard.expiry_date_is_required_if_available_on_saturday'),

            'sunday_from.required_if' => __('dashboard.the_start_date_is_required_if_available_on_sunday'),
            'sunday_to.required_if' => __('dashboard.expiry_date_is_required_if_available_on_sunday'),

            'monday_from.required_if' => __('dashboard.the_start_date_is_required_if_available_on_monday'),
            'monday_to.required_if' => __('dashboard.expiry_date_is_required_if_available_on_monday'),

            'tuesday_from.required_if' => __('dashboard.the_start_date_is_required_if_available_on_tuesday'),
            'tuesday_to.required_if' => __('dashboard.expiry_date_is_required_if_available_on_tuesday'),

            'wednesday_from.required_if' => __('dashboard.the_start_date_is_required_if_available_on_wednesday'),
            'wednesday_to.required_if' => __('dashboard.expiry_date_is_required_if_available_on_wednesday'),

            'thursday_from.required_if' => __('dashboard.the_start_date_is_required_if_available_on_thursday'),
            'thursday_to.required_if' => __('dashboard.expiry_date_is_required_if_available_on_thursday'),

            'friday_from.required_if' => __('dashboard.the_start_date_is_required_if_available_on_friday'),
            'friday_to.required_if' => __('dashboard.expiry_date_is_required_if_available_on_friday'),
        ];
    }
}
