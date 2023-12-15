<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\Aniversario;

class DisparaEmailLembrete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emailaniversario:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispara email na data de aniversário';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $consultas = DB::select('SELECT * from pacientes where date_format(dt_nascimento, "%M %d") = date_format(now(), "%M %d") and deleted_at is null');
        
        foreach($consultas as $consulta){
            $emailData = [
                'title' => 'Feliz Aniversário.',
                'body' => "Olá, $consulta->nome, ". config('app.name'). " te deseja um feliz aniversário."
            ];
    
            Mail::to($consulta->email)->send(new Aniversario($emailData));
        }
        
    }
}
