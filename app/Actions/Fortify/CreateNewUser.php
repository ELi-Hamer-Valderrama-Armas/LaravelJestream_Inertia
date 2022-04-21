<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'NumeroDocumento'=> ['Required'],
                'Telefono'=> ['Nullable'],
                'Ciudad'=> ['Nullable'],
                'Calle'=> ['Nullable'],
                'Numero'=> ['Nullable'],
                'Role'=> ['Required'],  


            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'NumeroDocumento'=> $input['NumeroDocumento'],
                'Telefono'=> $input['Telefono'],
                'Ciudad'=> $input['Ciudad'],
                'Calle'=> $input['Calle'],
                'Numero'=> $input['Numero'],
                'Role'=> $input['Role'],  
            'password' => Hash::make($input['password']),
        ]);
    }
}
