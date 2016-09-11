<?php


namespace Extension\Site\Http;


use Nuclear\Hierarchy\NodeRepository;
use Reactor\Http\Controllers\Controller;

class SiteController extends Controller {

    /**
     * Shows the homepage
     *
     * @param NodeRepository $nodeRepository
     * @return View
     */
    public function getHome(NodeRepository $nodeRepository)
    {
        $home = $nodeRepository->getHome();

        return view('index', compact('home'));
    }

    /**
     * Shows a page
     *
     * @param NodeRepository $nodeRepository
     * @param $name
     * @return View
     */
    public function getPage(NodeRepository $nodeRepository, $name)
    {
        $node = $nodeRepository->getNodeAndSetLocale($name);

        return view('page', compact('node'));
    }

}