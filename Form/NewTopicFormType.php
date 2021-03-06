<?php

namespace Herzult\Bundle\ForumBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Herzult\Bundle\ForumBundle\Model\CategoryRepositoryInterface;

class NewTopicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subject');
        $builder->add('category');
        $builder->add('firstPost', $options['post_form'], array('data_class' => $options['post_class']));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'post_class'    => '',
            'post_form'     => '',
            'data_class'    => '',
        );
    }

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'post_class'    => 'Acme\Bundle\ForumBundle\Entity\Post',
            'post_form'     => new PostFormType(),
            'data_class'    => 'Acme\Bundle\ForumBundle\Entity\Topic',
        ));
    }
	
    public function getName()
    {
        return 'NewTopic';
    }
}
