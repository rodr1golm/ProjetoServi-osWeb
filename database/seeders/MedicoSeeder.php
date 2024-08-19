<?php

namespace Database\Seeders;

use App\Models\Medico;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Medico::where('cpf', '12345678901')->first()){
            Medico::create([
                'nome' => 'Carla Silva',
                'registro' => 'CFM 101',
                'cpf' => '12345678901',
                'especializacao' => 'Geriatra',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678902')->first()){
            Medico::create([
                'nome' => 'Joao Carlos',
                'registro' => 'CFM 102',
                'cpf' => '12345678902',
                'especializacao' => 'Oftalmologista',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678903')->first()){
            Medico::create([
                'nome' => 'Maria Fernandes',
                'registro' => 'CFM 103',
                'cpf' => '12345678903',
                'especializacao' => 'Cardiologista',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678904')->first()){
            Medico::create([
                'nome' => 'Carlos Pereira',
                'registro' => 'CFM 104',
                'cpf' => '12345678904',
                'especializacao' => 'Dermatologista',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678905')->first()){
            Medico::create([
                'nome' => 'Ana Souza',
                'registro' => 'CFM 105',
                'cpf' => '12345678905',
                'especializacao' => 'Pediatra',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678906')->first()){
            Medico::create([
                'nome' => 'Marcos Lima',
                'registro' => 'CFM 106',
                'cpf' => '12345678906',
                'especializacao' => 'Neurologista',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678907')->first()){
            Medico::create([
                'nome' => 'Fernanda Costa',
                'registro' => 'CFM 107',
                'cpf' => '12345678907',
                'especializacao' => 'Ortopedista',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678908')->first()){
            Medico::create([
                'nome' => 'Ricardo Oliveira',
                'registro' => 'CFM 108',
                'cpf' => '12345678908',
                'especializacao' => 'Psiquiatra',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678909')->first()){
            Medico::create([
                'nome' => 'Patrícia Azevedo',
                'registro' => 'CFM 109',
                'cpf' => '12345678909',
                'especializacao' => 'Urologista',
            ]);
        }
        
        if(!Medico::where('cpf', '12345678910')->first()){
            Medico::create([
                'nome' => 'Lucas Almeida',
                'registro' => 'CFM 110',
                'cpf' => '12345678910',
                'especializacao' => 'Endocrinologista',
            ]);
        }
    }
}
