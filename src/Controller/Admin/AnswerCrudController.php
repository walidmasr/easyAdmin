<?php

namespace App\Controller\Admin;

use App\Controller\QuestionController;
use App\EasyAdmin\VotesField;
use App\Entity\Answer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class AnswerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Answer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        yield Field::new('answer');
        yield IntegerField::new('votes')
            ->setTemplatePath('admin/field/votes.html.twig');
        yield AssociationField::new('question')
            ->autocomplete()
            ->setCrudController(QuestionController::class)
            ->hideOnIndex();
        yield VotesField::new('votes', 'Total Votes')
            ->setTextAlign('right');
        yield AssociationField::new('answeredBy');
        yield Field::new('createdAt')
            ->hideOnForm();
        yield Field::new('updatedAt')
            ->onlyOnDetail();
    }
}
