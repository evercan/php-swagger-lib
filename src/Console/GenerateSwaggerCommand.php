<?php
namespace SwaggerLib\Console;

use Illuminate\Console\Command;

class GenerateSwaggerCommand extends Command
{
    protected $signature = 'swagger:generate';
    protected $description = 'Gera documentação Swagger a partir das anotações OpenAPI';

    public function handle()
    {
        $generator = app('swagger.generator');
        $generator->generate();

        $this->info('Documentação Swagger gerada com sucesso!');
    }
}