<?php

namespace Drupal\guest_book\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class that control displaying form.
 */
class CommentsController extends ControllerBase {

  /**
   * Drupal services.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityManager;

  /**
   * Drupal services.
   *
   * @var \Drupal\Core\Entity\EntityFormBuilder
   */
  protected $formBuild;

  /**
   * Method provide dependency injection and add services.
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->entityManager = $container->get('entity_type.manager');
    $instance->formBuild = $container->get('entity.form_builder');
    return $instance;
  }

  /**
   * Method that create output of module.
   */
  public function build() {

    $entity = $this->entityManager
      ->getStorage('guest_book_comment')
      ->create([
        'entity_type' => 'node',
        'entity' => 'guest_book_comment',
      ]);
    $form = $this->formBuild->getForm($entity, 'default');

    $storage = $this->entityManager->getStorage('guest_book_comment');
    $entity = $storage->getQuery()
      ->sort('created', 'DESC')
      ->pager(5);

    $coments_ids = $entity->execute();
    $view_builder = $this->entityManager->getViewBuilder('guest_book_comment');

    $comments = $storage->loadMultiple($coments_ids);
    $pre_render = [];

    foreach ($comments as $comment) {
      $pre_render[] = $view_builder->view($comment);
    }

    $pager = [
      '#type' => 'pager',
    ];

    return [
      '#theme' => 'guest_book_template',
      '#form' => $form,
      '#comment' => $pre_render,
      '#pager' => $pager,
    ];
  }

}
