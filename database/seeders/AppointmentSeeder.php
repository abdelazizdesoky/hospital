<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->delete();

        $Appointments =[
            ['name'=>'السبت'],
            ['name'=>'الاحد'],
            ['name'=>'الاثنين'],
            ['name'=>'الثلاثاء'],
            ['name'=>'الاربعاء'],
            ['name'=>'الخميس'],
            ['name'=>'الجمعة'],
        ];

        foreach ($Appointments as $Appointment){

            Appointment::create($Appointment);
        }
    }
}
