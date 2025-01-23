<?php

declare(strict_types=1);

namespace App\Command;

use PDOException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;

class CreateSessionStorageTableCommand extends Command
{
    private PdoSessionHandler $sessionHandler;

    protected static $defaultName = 'app:create-session-storage-table';

    public function __construct(PdoSessionHandler $sessionHandler)
    {
        parent::__construct();

        $this->sessionHandler = $sessionHandler;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $this->sessionHandler->createTable();

            return 0;
        } catch (PDOException $exception) {
            $output->writeln($exception->getMessage());
        }

        return -1;
    }
}
