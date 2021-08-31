<?php

namespace Drupal\guest_book\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * It's provide my entity type.
 *
 * @ContentEntityType(
 *   id = "guest_book_comment",
 *   label = @Translation("Guest Book"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "form" = {
 *       "default" = "Drupal\guest_book\Form\CommentForm",
 *       "delete" = "Drupal\guest_book\Form\DeleteForm",
 *     },
 *   },
 *   base_table = "comments",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "canonical" = "/guest_book_comment/{guest_book_comment}",
 *     "edit-form" = "/guest_book_comment/{guest_book_comment}/edit",
 *     "delete-form" = "/guest_book_comment/{guest_book_comment}/delete",
 *   },
 * )
 */
class GuestBook extends ContentEntityBase {

  /**
   * {@inheritDoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type):array {

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the comment entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the comment entity.'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('Write your name'))
      ->setSettings([
        'max_length' => 100,
      ])
      ->setPropertyConstraints('value', [
        'Length' => [
          'min' => 2,
          'minMessage' => 'You name must be longer than 2 symbols',
        ],
      ])
      ->setRequired(TRUE)
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => 10,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'weight' => 10,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('Write you email.'))
      ->setSettings([
        'max_length' => 255,
      ])
      ->setPropertyConstraints(
        'value', [
          'Regex' => [
            'pattern' => '/^[\w+]{2,100}@([\w+]{2,30})\.[\w+]{2,30}$/',
            'message' => t('Email must be like this "yourname@mail.com"'),
          ],
        ]
      )
      ->setRequired(TRUE)
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'email',
        'weight' => 20,
      ])
      ->setDisplayOptions('form', [
        'type' => 'email',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['telephone'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Telephone'))
      ->setDescription(t('Write you telephone.'))
      ->setSettings([
        'max_length' => 13,
      ])
      ->setPropertyConstraints(
        'value', [
          'Regex' => [
            'pattern' => '/^[0-9]{12}$/',
            'message' => t('Your number must have 12 numbers. You can use only numbers'),
          ],
        ]
      )
      ->setRequired(TRUE)
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => 30,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'weight' => 30,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['feedback'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Feedback'))
      ->setDescription(t('Write you feedback.'))
      ->setRequired(TRUE)
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'text_default',
        'weight' => 40,
      ])
      ->setDisplayOptions('form', [
        'label' => 'above',
        'type' => 'string_long',
        'weight' => 40,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['avatar'] = BaseFieldDefinition::create('image')
      ->setLabel(t('The avatar'))
      ->setDescription(t('The avatar.'))
      ->setSettings([
        'file_extensions' => 'png jpg jpeg',
        'file_directory' => 'images/avatars/',
        'max_filesize' => 2097152,
        'alt_field' => FALSE,
      ])
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'image',
        'weight' => 50,
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
        'weight' => 50,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['picture'] = BaseFieldDefinition::create('image')
      ->setLabel(t('The picture'))
      ->setDescription(t('The picture.'))
      ->setSettings([
        'file_extensions' => 'png jpg jpeg',
        'file_directory' => 'images/pictures/',
        'max_filesize' => 5242880,
        'alt_field' => FALSE,
      ])
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'image',
        'weight' => 60,
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
        'weight' => 60,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of ContentEntityExample entity.'));
    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'))
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'datetime_custom',
        'settings' => [
          'data_format' => 'm/j/Y H:i:s',
        ],
        'weight' => 70,
      ])
      ->setDisplayConfigurable('view', TRUE);
    return $fields;
  }

}
