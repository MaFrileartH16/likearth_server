<?php
  
  namespace App\Http\Requests;
  
  use Illuminate\Foundation\Http\FormRequest;
  
  class RegisterRequest extends FormRequest
  {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
      return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
      return [
        'full_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'phone_number' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'gender' => 'required|string|in:male,female',
      ];
    }
    
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
      return [
        'full_name.required' => 'Full name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Email must be a valid email address.',
        'email.unique' => 'Email is already taken.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.confirmed' => 'Password confirmation does not match.',
        'phone_number.required' => 'Phone number is required.',
        'address.required' => 'Address is required.',
        'birth_date.required' => 'Birth date is required.',
        'birth_date.date' => 'Birth date must be a valid date.',
        'gender.required' => 'Gender is required.',
        'gender.in' => 'Gender must be either male or female.',
      ];
    }
  }
