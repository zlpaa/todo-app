<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Kelas ini adalah Factory untuk model User.
 * Menghasilkan instance User dengan data palsu.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Password yang saat ini digunakan oleh factory.
     * Password ini diset hanya sekali untuk semua instance yang dihasilkan.
     */
    protected static ?string $password;

    /**
     * Menentukan state default model.
     *
     * Method ini mendefinisikan data default yang akan digunakan 
     * untuk menghasilkan instance dari model User.
     * 
     * @return array<string, mixed> - Mengembalikan array yang berisi data 
     * untuk dipakai dalam pembuatan model User.
     */
    public function definition(): array
    {
        return [
            // Menghasilkan nama pengguna palsu menggunakan Faker
            'name' => fake()->name(),
            
            // Menghasilkan email unik yang aman dan palsu menggunakan Faker
            'email' => fake()->unique()->safeEmail(),
            
            // Menandakan waktu verifikasi email (sekarang)
            'email_verified_at' => now(),
            
            // Menggunakan password yang telah di-hash menggunakan Laravel Hash facade
            // Jika $password belum diset, maka password default yang digunakan adalah "password"
            'password' => static::$password ??= Hash::make('password'),
            
            // Membuat token acak untuk keperluan "remember me" di aplikasi
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Menandakan bahwa alamat email model ini harus dianggap belum terverifikasi.
     * 
     * Metode ini digunakan untuk mengubah status verifikasi email menjadi null
     * pada saat instance User dibuat.
     * 
     * @return static - Mengembalikan instance baru dari UserFactory dengan status email null.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            // Mengatur atribut email_verified_at menjadi null
            'email_verified_at' => null,
        ]);
    }
}
