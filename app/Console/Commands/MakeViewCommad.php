<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeViewCommad extends Command
{
    /**
     *
     * @var string
     */
    protected $signature = 'make:view {view}';
    /**

     *
     * @var string
     */
    protected $description = 'Create a new blade template.';
    /**

     *
     * @return mixed
     */
    public function handle()
    {
      $view = $this->argument('view');
      $path = $this->viewPath($view);
      $this->createDir($path);
      if (File::exists($path))
      {
          $this->error("File {$path} already exists!");
          return;
      }
      File::put($path, $path);
      $this->info("File {$path} created.");
    }
    /**
     * Get the view full path.
     *
     * @param string $view
     *
     * @return string
     */
    public function viewPath($view)
    {
      $view = str_replace('.', '/', $view) . '.blade.php';
      $path = "resources/views/{$view}";
      return $path;
    }
    /**
     * Create a view directory if it does not exist.
     *
     * @param $path
     */
    public function createDir($path)
    {
      $dir = dirname($path);
      if (!file_exists($dir))
      {
          mkdir($dir, 0777, true);
      }
    }
  }
