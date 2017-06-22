<?php
namespace AppBundle\Command;

use FOS\OAuthServerBundle\Entity\ClientManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateClientCommand
 * @package AppBundle\Command
 */
class CreateClientCommand extends ContainerAwareCommand
{
    /**
     * ex: php bin/console fos:oauth-server:create-client android --redirect-uri=http://www.google.com
     * --grant-type=token --grant-type=authorization_code
     */
    protected function configure()
    {
        $this
            ->setName('fos:oauth-server:create-client')
            ->setDescription('Create a new client')
            ->addArgument('name', InputArgument::REQUIRED, 'Sets the client name', null)
            ->addOption('redirect-uri', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Sets redirect uri for client. Use this option multiple times to set multiple redirect URIs.', null)
            ->addOption('grant-type', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Sets allowed grant type for client. Use this option multiple times to set multiple grant types.', null);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ClientManager $clientManager */
        $clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setName($input->getArgument('name'));
        $client->setRedirectUris($input->getOption('redirect-uri'));
        $client->setAllowedGrantTypes($input->getOption('grant-type'));
        $clientManager->updateClient($client);
        $output->writeln(sprintf('Added a new client with name <info>%s</info> and public id <info>%s</info>.', $client->getName(), $client->getPublicId()));
        $output->writeln("You can test this at: /oauth/v2/auth?client_id={$client->getPublicId()}&response_type=code&redirect_uri=http%3A%2F%2Fwww.google.com");
    }
}
