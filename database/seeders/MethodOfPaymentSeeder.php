<?php

namespace Database\Seeders;

use App\Models\Method_of_payment;
use Illuminate\Database\Seeder;

class MethodOfPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $method_of_payment_list = [
        	'Efectivo', 'Cheque', 'Fin. Bancaria', 'Fin. Propia',
        	'Tarjeta de Credito',  'Tarjeta de Debito', 'Aso. Empleados',
        	'Otro'
        ];

        Method_of_payment::truncate();

        foreach ($method_of_payment_list as $payments) {
        	Method_of_payment::create(['description' => $payments]);
        }
    }
}
