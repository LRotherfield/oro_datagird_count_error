<?php

namespace Defacto\Bundle\ExampleBundle\Controller;

use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/item", name="defacto_item_index")
     * @Template()
     * @Acl(
     *      id="defacto_subscription_index",
     *      type="entity",
     *      class="DefactoExampleBundle:Item",
     *      permission="VIEW"
     * )
     */
    public function indexAction()
    {
        return [];
    }
}
