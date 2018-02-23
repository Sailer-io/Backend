#!/bin/bash
if [ $TRAVIS_BRANCH == 'develop' ]; then
    eval "$(ssh-agent -s)"
    chmod 600 .travis/deploy.key
    ssh-add .travis/deploy.key
    rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$TFOLDER
    ssh -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $TFOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate:fresh --seed"
elif [ $TRAVIS_BRANCH == 'master' ]; then
    eval "$(ssh-agent -s)"c
    chmod 600 .travis/deploy.key
    ssh-add .travis/deploy.key
    rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$FOLDER
    ssh -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $FOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate --force"
fi