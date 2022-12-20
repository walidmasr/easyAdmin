## Install
- composer require admin
- symfony console make:admin:dashboard

## Dashboard

### configureMenuItems
- MenuItem::linkToDashbord()
- MenuItem::linkToCrud
- MenuItem::linkToUrl()
- MenuItem::section('Content');
- MenuItem::subMenu->setSubItem()

#### Only on linkToCrud
- setPermission()
- setController()

#### Only on linkToUrl
- setLinkTarget('_blank')

### configureUserMenu
- setAvatarUrl($user->getAvatarUri())
- addMenuItems([MenuItem::linkToUrl('....', 'icon', $this->generateUrl('account' ))]);

## Page and Action
- ACTION_NEW
- ACTION_DETAIL
- ACTION_INDEX
- ACTION_EDIT
- ACTION_DELETE
- ACTION_BATCH_DELETE

## CRUD page

### Field
- FormField::addTab('Lineups')
- IntegerField
- AssociateField
- BooleanField
- TextField
- TextAreaField
- ArrayField
- ChoiceField (with array for limited choice)
- ImageField
- CollectionField::new('lineups')

### Method Only on CollectionField
 - setEntryIsComplex()
 - setEntryType(LineupType::class)
 - hideOnIndex()
 - renderExpanded()

### Method only on ChoiceField:
- setChoices(array_combine($roles, $roles))
- allowMultipleChoices()
- renderExpanded()
- renderAsBadges()

### Method only on ImageField
- setBasePath("/img/team")
- setUploadDir("/public/img/team")
- setUploadedFileNamePattern('[timestamp].[extension]')

### Method only on AssociateField
- setFormTypeOption('choice_label', 'id')
- setFormTypeOption('by_reference', false)

### General method
- setHelp('Available role: ROLE_USER, ROLE_ADMIN')
- renderAsSwitch(false) (only on Boolean)
- setTextAlign()
- setMaxLength() only on TextField
- setColumns(5)
- setTemplatePath()
- setPermission()
- setFormTypeOptions(["attr"=> ['readonly' => true]])
- formatValue(static function(User $user){return $user->getAvatarUrl()})
- autocomplete()
- setCrudControl(QuestionCrudController::class)
- OnlyOnDetail() (show)
- hideOnForm() (edit)

## ConfigureCrud: sorting or displaying Action button
- setPageTitle(Crud::PAGE_INDEX, 'new title')
- setHelp(Crud::PAGE_INDEX, 'new Help')
- setDefaultSort()
- showEntityActionsInlined()
- setEntityPermission("ADMIN_USER_EDIT")

## ConfigureAction: set permission on Action
- add(Crud::PAGE_INDEX, Action::DETAIL)
- setPermission()

## ConfigFilterrs
add('field')

## createIndexQueryBuilder
return custom queryBuilder 

## ConfigureAction: set permission on Action
- setPermission()
- add(Crud::PAGE_DETAIL, $viewAction)
- add(Crud::PAGE_INDEX, Action::DETAIL)
- disable(Action::DETAIL)

## updateEntity and deleteEntity
auto-update entity / forbidden delete

## Create a new CRUD page with specific query

## Create a subscriber to Event : BeforeEntityUpdatedEvent
update question.updatedBy connected user 

## Template
Add template
{# @var ea \EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext #}
{# @var field \EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto #}
{# @var entity \EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto #}

## Permission
- On field
- On Entity
- On Action

## Create Action::new('actionName')
- addCssClass()
- setIcon()
- setLabel()
- displayAsButton()
- setTemplatePath()
- displayIf(static function(Question $question): bool {return !$question->getIsApproved();})

->linkToCrudAction()
->linkToUrl(function (Question $question) {
       return $this->generateUrl('app_question_show', [
                    'slug' => $question->getSlug(),
          ]);
      })


## AdminUrlGenerator
- setController(self::class)
- setAction(Crud::PAGE_DETAIL)
- setEntityId($question->getId())
- generateUrl();