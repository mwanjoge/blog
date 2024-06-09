<?php

namespace Nisimpo\Blog;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Finder\SplFileInfo;

#[AsCommand(name: 'blog:install')]
class InstallationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold the blog files';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->components->info('Preparing for blog installation');

        if (! is_dir($directory = app_path('Http/Controllers/Blog'))) {
            mkdir($directory, 0755, true);
        }

        $this->components->info('Copying blog controllers files');
        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__.'/Controllers/stubs'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Blog/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
        $this->info('Done............................................');

        $this->components->info('Copying blog routes to web.php  route file');
        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/routes/routes.stub'),
            FILE_APPEND
        );
        $this->info('Done............................................');

        $this->components->info('Publishing blog views and migrations');
        $this->call("vendor:publish",[
            '--tag' => 'blog',
            '--force' => true,
        ]);
        $this->info('Done............................................');

        $this->info('Blog files scaffolding generated successfully.');
    }
}
