<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\CallbackTransformer;

class RegistrationFormType extends AbstractType
{
    /**
     * @var array
     */
    protected $mergeOptions;
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class        The User class name
     * @param array  $mergeOptions Add options to elements
     */
    public function __construct($class, array $mergeOptions = array())
    {
        $this->class = $class;
        $this->mergeOptions = $mergeOptions;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array_merge(array(
                'label' => 'form.username',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('email', 'email', array_merge(array(
                'label' => 'form.email',
                'translation_domain' => 'SonataUserBundle',
                'constraints' => array(
                    new Regex(array(
                        'pattern' => '/^[a-z\.-]+@edu\.esiee\.fr$/',
                        'match'   => 'true',
                        'message' => 'Vous devez avoir un mail @edu.esiee.fr',
                    )),
                ),
            ), $this->mergeOptions))
            ->add('plainPassword', 'repeated', array_merge(array(
                'type' => 'password',
                'options' => array('translation_domain' => 'SonataUserBundle'),
                'first_options' => array_merge(array(
                    'label' => 'form.password',
                ), $this->mergeOptions),
                'second_options' => array_merge(array(
                    'label' => 'form.password_confirmation',
                ), $this->mergeOptions),
                'invalid_message' => 'fos_user.password.mismatch',
            ), $this->mergeOptions))
            ->add('tags', 'text', array_merge(array(
                'mapped' => false,
                'required' => false,
                ), $this->mergeOptions))
            ->add('isAvailable', 'checkbox', array_merge(array(
                'required' => false,
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('cv', 'sonata_media_type', array_merge(array(
                'label' => 'Curriculum Vitae',
                'provider' => 'sonata.media.provider.file',
                'context'  => 'CurriculumVitae',
                'required' => false,
            ), $this->mergeOptions))
            ->add('phone', null, array_merge(array(
                'label' => 'form.phone',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
        ;
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated Remove it when bumping requirements to Symfony 2.7+
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'registration',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
