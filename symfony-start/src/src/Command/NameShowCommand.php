<?php

namespace App\Command;

use App\Repository\HotelRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\Table;
use function Symfony\Component\String\u;

#[AsCommand(
    name: 'app:name:show',
    description: 'Add command to show hotel details.',
)]
class NameShowCommand extends Command
{
    /**
     * @var HotelRepository
     */
    private HotelRepository $hotelRepo;

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @param HotelRepository $hotelRepo
     * @param EntityManagerInterface $entityManager
     * @param UserRepository $userRepository
     * @param string|null $name
     */
    public function __construct(
        HotelRepository $hotelRepo,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        string $name = null
    ) {
        parent::__construct($name);
        $this->hotelRepo = $hotelRepo;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }


    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $userResult = $this->userRepository->createQueryBuilder('u')->
            select("u.userName as username")
            ->addSelect("u.id as userID")
            ->getQuery()->getArrayResult();

        $result = $this->hotelRepo->createQueryBuilder('h')->
        select("h.name as hotelName")
            ->addSelect("h.city as hotelCity")
            ->addSelect("h.star as hotelStar")
            ->getQuery()->getArrayResult();

        $result = $result[0];
        $userResult = $userResult[0];

        $table = new Table($output);
        $table->setHeaders(["ID","Username","Hotel Name", "City", "Star"]);
        $table->setRows([
            [
                $userResult["userID"],
                $userResult["username"],
                $result["hotelName"],
                $result["hotelCity"],
                $result["hotelStar"],
            ],
        ]);
        $table->setStyle("box-double");
        $table->render();

        return Command::SUCCESS;
    }
}
