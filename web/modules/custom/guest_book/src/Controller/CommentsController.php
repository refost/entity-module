<?php

namespace Drupal\guest_book\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\Controller\EntityViewController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityViewBuilder;
use Drupal\Core\Routing\UrlGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

class CommentsController extends ControllerBase {

  protected $entityForm;

  protected $formBuild;

  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->entityForm = $container->get('entity_type.manager');
    $instance->formBuild = $container->get('entity.form_builder');
    return $instance;
  }

  public function build() {
    $entity = $this->entityForm
      ->getStorage('guest_book_comment')
      ->create([
        'entity_type' => 'node',
        'entity' => 'guest_book_comment',
      ]);
   $form = $this->formBuild->getForm($entity, 'default');

   $this->getComments();

    return $form;
}

  public function getComments():array {

    // Connect to database and select fields.
    $results = \Drupal::database()
      ->select('comments', 'comment')
      ->fields('comment', [
        'id',
        'name',
        'email',
        'telephone',
        'comment',
        'created',
        'picture__target_id',
        'avatar__target_id',
      ])
      ->execute()->fetchAll();

    // Creating array from database.
    $commment = [];
    foreach ($results as $data) {
      $image = $this->getImage($data->picture__target_id);
      $avatar = $this->getImage($data->avatar__target_id);

      // If there is no image then default is used.
      if ($avatar == NULL) {
        $avatar = [
          '#theme' => 'image',
          '#uri' => '/modules/custom/guestBook/files/User_Icon.png',
          '#attributes' => [
            'alt' => 'picture',
            'width' => 250,
            'height' => 250,
          ],
        ];
      }

//      $url_delete = Url::fromRoute('guestBook.delete', ['id' => $data->id], []);
//      $linkDelete = $this->linkCreate('Delete', $url_delete);
//
//      $url_edit = Url::fromRoute('guestBook.edit', ['id' => $data->id], []);
//      $linkEdit = $this->linkCreate('Edit', $url_edit);

      $phone = $this->userPhone($data->telephone);

      $commment[] = [
        'name' => $data->name,
        'email' => $data->email,
        'phone' => $phone,
        'comment' => $data->comment,
        'image' => $image,
        'avatar' => $avatar,
        'date' => date('Y-m-d H:i:s', $data->created),
//        'delete' => $linkDelete,
//        'edit' => $linkEdit,
      ];
    }

    if ($commment != NULL) {
      krsort($commment);
    }

    return $commment;
  }

  /**
   * Function get image if it not null then renderer array is created.
   */
  public function getImage($image) {
    if ($image != NULL) {

      $file = File::load($image);
      $path = $file->getFileUri();
      $image_render = [
        '#theme' => 'image',
        '#uri' => $path,
        '#attributes' => [
          'alt' => 'picture',
          'width' => 250,
          'height' => 250,
        ],
      ];
    }
    else {
      $image_render = NULL;
    }
    return $image_render;
  }

  /**
   * Function that convert number in easy form.
   */
  public function userPhone($phone):string {
    $userPhone = '+';
    $length = strlen($phone);

    for ($i = 0; $i < $length; $i++) {
      switch ($i) {
        case 2:
          $userPhone .= '(' . $phone[$i];
          break;

        case 4:
          $userPhone .= $phone[$i] . ')-';
          break;

        case 7:
          $userPhone .= $phone[$i] . '-';
          break;

        default:
          $userPhone .= $phone[$i];
      }
    }
    return $userPhone;
  }

}
