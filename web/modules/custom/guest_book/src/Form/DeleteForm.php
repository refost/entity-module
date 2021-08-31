<?php

namespace Drupal\guest_book\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a guest_book_comment entity.
 */
class DeleteForm extends ContentEntityConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete entity ?');
  }

  /**
   * {@inheritdoc}
   *
   * If the delete command is canceled, return to the list of comments.
   */
  public function getCancelUrl() {
    return new Url('guest_book.comments');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->delete();

    $form_state->setRedirect('guest_book.comments');
  }

}
