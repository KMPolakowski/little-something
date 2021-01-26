<?php

declare(strict_types=1);

class AbstractFileSystem
{
    private String $rootDir;

    private array $pathDirs;

    public function __construct(String $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    public function cd(String $path): void
    {
        $newPathDirs = [];

        $pathChanges = explode('/', $path);

        foreach ($pathChanges as $change) {
            if ($change === '..') {
                array_pop($this->pathDirs);
                continue;
            }

            if (!empty($change)) {
                $this->pathDirs[] = $change;
            }
        }
    }

    public function getCurrentPath(): String
    {
        return $this->rootDir . implode('/', $this->pathDirs);
    }
}

$fs = new AbstractFileSystem('/');
$fs->cd('Documents/blah/asdads');
$fs->cd('..');
$fs->cd('blah');
$fs->cd('/../../../');

echo $fs->getCurrentPath();
