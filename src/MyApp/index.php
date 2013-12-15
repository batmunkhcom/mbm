<?php

use \Blog\Library\Loader\Autoloader as Autoloader,
    \Blog\Service\ServiceLocator as ServiceLocator,
    \Blog\Injector\EntryServiceInjector as EntryServiceInjector,
    \Blog\Model\Entry as Entry;

// include the autoloader
require_once __DIR__ . '/Library/Loader/Autoloader.php';
$autoloader = new Autoloader;

// create the service locator
$serviceLocator = new ServiceLocator;

// add the entry service injector to the service locator
$serviceLocator->addInjector('entry', new EntryServiceInjector);

// get the entry service via the associated service injector
$entryService = $serviceLocator->getService('entry');

// display all the entries along with their associated comments (comments are lazy-loaded from the storage)
$entries = $entryService->find();
foreach ($entries as $entry) {
    echo '<h2>' . $entry->title . '</h2>';
    echo '<p>' . $entry->content . '</p>';
    foreach ($entry->comments as $comment) {
        echo '<p>' . $comment->content . ' ' . $comment->author->name . '</p>';
    }
}

// add a new entry to the storage
$entry = new Entry(array(
    'title'   => 'My fourth blog post',
    'content' => 'This is the content of the fourth blog post'
));
$entryService->insert($entry);

// delete an entry from the storage
$entryService->delete(1);

