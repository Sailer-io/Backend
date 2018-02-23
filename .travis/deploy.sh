#!/bin/bash
if [ $TRAVIS_BRANCH == 'develop' ]; then
    sudo mkdir -p ~/.ssh
    echo $(echo $SSH_PRIVATE_KEY | base64 -d) > ~/.ssh/id_rsa
    chmod 600 ~/.ssh/id_rsa
    rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$TFOLDER
    ssh -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $TFOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate:fresh --seed"
elif [ $TRAVIS_BRANCH == 'master' ]; then
    mkdir -p ~/.ssh
    echo $(echo $SSH_PRIVATE_KEY | base64 -d) > ~/.ssh/id_rsa
    chmod 600 ~/.ssh/id_rsa
    rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$FOLDER
    ssh -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $FOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate --force"
fi