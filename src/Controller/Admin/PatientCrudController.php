<?php

namespace App\Controller\Admin;

use App\Entity\Patient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use Symfony\Contracts\Translation\TranslatorInterface;

class PatientCrudController extends AbstractCrudController
{

    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }


    public static function getEntityFqcn(): string
    {
        return Patient::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateTimeField::new('createdAt', $this->translator->trans('createdAt'))->hideOnForm()
                ->setFormat('dd MMM yy - HH:mm'),
            TextField::new('firstname', $this->translator->trans('firstname')),
            TextField::new('lastname', $this->translator->trans('lastname')),
            DateField::new('birthdate', $this->translator->trans('birthdate')),
            BooleanField::new('gender', $this->translator->trans('woman'))->renderAsSwitch(false),
            TextField::new('getAge', $this->translator->trans('age'))->onlyOnIndex()
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular($this->translator->trans('patient'))
            ->setEntityLabelInPlural($this->translator->trans('patients'))
        ;
    }
    
}
