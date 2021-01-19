<?php

namespace App\Listeners;

use App\User;
use App\Events\NovaSerie;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarEmailNovaSerieCadastrada implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $users = User::all();

        foreach($users as $index => $user)
        {
            $multiplicaador = $index + 1;

            $email = new \App\Mail\NovaSerie(
                $event->nome,
                $event->qtd_temporadas,
                $event->ep_por_temporada
            );

            $email->subject = 'Nova Série Adicionada';
            $when = now()->addSecond($multiplicaador * 10);

            \Illuminate\Support\Facades\Mail::to($user)
            ->later($when, $email);

        }

    }
}
