<?php

namespace App\Models;

use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'email',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    /**
     * Aturan validasi untuk model ini.
     *
     * @return array
     */
    public static function rules($process)
    {
        if ($process == 'insert') {
            return [
                'name' => 'required|string|max:225',
                'birthdate' => 'required|date',
                'email' => 'required|email|unique:authors,email',
            ];
        } elseif ($process == 'update') {
            return [
                'name' => 'required|string|max:225',
                'birthdate' => 'required|date',
                'email' => 'required|email|unique:authors,email',
            ];
        }
    }

    /**
     * Mendaftarkan aturan validasi kustom.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public static function customValidation(Validator $validator)
    {
        $customAttributes = [
            'name' => 'Nama',
            'birthdate' => 'Tanggal Lahir',
            'email' => 'Email',
        ];

        $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
        });

        $validator->addReplacer('date', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa tanggal.');
        });

        $validator->addReplacer('email', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa alamat email yang valid.');
        });

        $validator->addReplacer('unique', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute sudah digunakan.');
        });
    }
}
