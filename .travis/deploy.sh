#!/bin/bash
echo $TRAVIS_BRANCH
if [ $TRAVIS_BRANCH == 'develop' ]; then
    sudo mkdir -p ~/.ssh
    sudo echo $(echo $SSH_PRIVATE_KEY | base64 -d) > ~/.ssh/id_rsa
    sudo chmod 600 ~/.ssh/id_rsa
    sudo rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$TFOLDER
    sudo ssh -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $TFOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate:fresh --seed"
elif [ $TRAVIS_BRANCH == 'master' ]; then
    sudo mkdir -p ~/.ssh
    sudo echo $(echo $SSH_PRIVATE_KEY | base64 -d) > ~/.ssh/id_rsa
    sudo chmod 600 ~/.ssh/id_rsa
    sudo rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$FOLDER
    sudo ssh -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $FOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate --force"
fi