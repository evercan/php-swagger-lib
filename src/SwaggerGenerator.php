<?php 
namespace SwaggerLib;

use OpenApi\Generator;

class SwaggerGenerator
{
    protected string $output;
    protected array $scanPaths;

    public function __construct(array $scanPaths = [], string $output = 'swagger.json')
    {
        $this->scanPaths = $scanPaths;
        $this->output = $output;
    }

    public function generate(): void
    {
        try {
            $openapi = \OpenApi\scan($this->scanPaths);
            file_put_contents($this->output, $openapi->toJson());
        } catch (\Throwable $e) {
            throw new \RuntimeException("Erro ao gerar documentação Swagger: " . $e->getMessage(), 0, $e);
        }
    }
}