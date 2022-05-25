Опис:

Хости, на яких потрібно розвернути інфраструктуру знаходиться в файлі hosts. За замовчуванням визначено кілька хостів для PROD та STAGING середовищ з IP адресами та іменем користувача для підключення по SSH. В цей файл потрібно додавати обо змінювати існуючі записи відповідно до середовища. Вимоги до хостів на яких потрібно розвернути проект:
 - повинен бути доступним по SSH
 - користувач на хості повинен мати право виконувати команди з sudo (запис "username ALL=(ALL) NOPASSWD:ALL" в /etc/sudoers)
 - встановлений пакет python3-minimal
Змінні для середовищ знаходиться в файлах group_vars/PROD та group_vars/STAGING, визначені змінні які будуть використовуваться в проекті:
 - env -> APP_ENV
 - group -> APP_PROJECT_GROUP

Запуск:

За замовчуванням командою

  ansible-playbook project.playbook

створяться проекти awesome, incredible, amazing на всіх хостах зазначених в файлі hosts, використовуючі змінні з group_vars/PROD та group_vars/STAGING

Для створення всіх проектів тільки на PROD або STAGING хостах:

  ansible-playbook project.playbook --extra-vars "HOSTS=PROD"
  ansible-playbook project.playbook --extra-vars "HOSTS=STAGING"

Зміна групи APP_PROJECT_GROUP  за замовчуванням на two:

  ansible-playbook project.playbook --extra-vars "HOSTS=STAGING group=two"

Створення тільки awesome проекту та зміна групи на two:

  ansible-playbook project.playbook --extra-vars "HOSTS=STAGING project=awesome group=two"

Створення проектів awesome та incredible та зміна групи на two:

  ansible-playbook project.playbook --extra-vars "HOSTS=STAGING {"project": [awesome,incredible]} group=one"

Перевизначення APP_PROJECT_GROUP проекта incredible:

  ansible-playbook project.playbook --extra-vars "HOSTS=PROD project=incredible group=one-incredible"


