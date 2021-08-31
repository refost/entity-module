<?php

namespace Drupal\guest_book\Form;

use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;

/**
 * Form controller for the guest_book_comment entity edit forms.
 */
class CommentForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /** @var \Drupal\guest_book\Entity\GuestBook $entity*/
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    $form['langcode'] = [
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    ];

    $form['name']['widget'][0]['value']['#ajax'] = [
      'callback' => '::validName',
      'event' => 'change',
      'disable-refocus' => TRUE,
      'progress' => [
        'type' => 'none',
      ],
    ];

    $form['email']['widget'][0]['value']['#ajax'] = [
      'callback' => '::validEmail',
      'event' => 'change',
      'disable-refocus' => TRUE,
      'progress' => [
        'type' => 'none',
      ],
    ];

    $form['telephone']['widget'][0]['value']['#ajax'] = [
      'callback' => '::validTelephone',
      'event' => 'change',
      'disable-refocus' => TRUE,
      'progress' => [
        'type' => 'none',
      ],
    ];

    $form['feedback']['widget'][0]['value']['#maxlength'] = [
      1000,
    ];

    return $form;
  }

  /**
   * Function that validate name and display message with status.
   */
  public function validName(array &$form, FormStateInterface $form_state):object {
    $name = $form_state->getValue('name')[0]['value'];

    $response = new AjaxResponse();
    if (strlen($name) < 2) {
      $response->AddCommand(
        new MessageCommand(
          $this->t('You name must be longer than 2 symbols'),
          '.field--name-name',
          [
            'type' => 'error',
          ]
        )
      );
    }
    else {
      $response->AddCommand(
        new MessageCommand(
          $this->t('You name is correct'),
          '.field--name-name',
          [
            'type' => 'status',
          ]
        )
      );
    }
    return $response;
  }

  /**
   * Function that validate email and display message with status.
   */
  public function validEmail(array &$form, FormStateInterface $form_state):object {
    $email = $form_state->getValue('email')[0]['value'];
    $regular = '/^[\w+]{2,100}@([\w+]{2,30})\.[\w+]{2,30}$/';

    $response = new AjaxResponse();
    if (!preg_match($regular, $email)) {
      $response->AddCommand(
        new MessageCommand(
          $this->t('Email must be like this "yourname@mail.com"'),
          '.field--name-email',
          [
            'type' => 'error',
          ]
        )
      );
    }
    else {
      $response->AddCommand(
        new MessageCommand(
          $this->t('You email is correct'),
          '.field--name-email',
          [
            'type' => 'status',
          ]
        )
      );
    }
    return $response;
  }

  /**
   * Function that convert number in easy for user form.
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

  /**
   * Function that validate telephone and display message with status.
   */
  public function validTelephone(array &$form, FormStateInterface $form_state):object {
    $phone = $form_state->getValue('telephone')[0]['value'];

    $regular = '/^[0-9]{12}$/';
    $response = new AjaxResponse();

    if (!preg_match($regular, $phone)) {
      $response->AddCommand(
        new MessageCommand(
          $this->t('Your number must have 12 numbers. You can use only numbers'),
          '.field--name-telephone',
          [
            'type' => 'error',
          ]
        )
      );
    }
    else {
      $response->AddCommand(
        new MessageCommand(
          $this->t('You phone is') . ' ' . $this->userPhone($phone),
          '.field--name-telephone',
          [
            'type' => 'status',
          ]
        )
      );
    }
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->save();
  }

}
