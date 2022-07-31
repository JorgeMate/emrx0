<?php

namespace App\Controller\Admin;

use App\Entity\Insurance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use Symfony\Contracts\Translation\TranslatorInterface;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class InsuranceCrudController extends AbstractCrudController
{

    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }


    public static function getEntityFqcn(): string
    {
        return Insurance::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', $this->translator->trans('insurance.name')),
            TextField::new('code', $this->translator->trans('insurance.code')),
            TelephoneField::new('tel', $this->translator->trans('tel')),
            EmailField::new('email'),
            TextareaField::new('notes', $this->translator->trans('notes')),
            BooleanField::new('enabled', $this->translator->trans('enabled'))
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular($this->translator->trans('insurance'))
            ->setEntityLabelInPlural($this->translator->trans('insurances'))
        ;
    }
}
