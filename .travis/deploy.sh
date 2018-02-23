#!/bin/bash
if [ $TRAVIS_BRANCH == 'develop' ]; then
    echo $(echo $SSH_PRIVATE_KEY | base64 -d) > /tmp/id_rsa
    chmod 600 /tmp/id_rsa
    rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -i /tmp/id_rsa -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$TFOLDER
    ssh -i /tmp/id_rsa -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $TFOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate:fresh --seed"
elif [ $TRAVIS_BRANCH == 'master' ]; then
    echo $(echo $SSH_PRIVATE_KEY | base64 -d) > /tmp/id_rsa
    chmod 600 /tmp/id_rsa
    rsync -az --exclude=.git --exclude=vendor --exclude=tests -e "ssh -i /tmp/id_rsa -o StrictHostKeyChecking=no -l $SSH_USER" ./ $IP:$FOLDER
    ssh -i /tmp/id_rsa -o StrictHostKeyChecking=no $SSH_USER@$IP "cd $FOLDER && composer install --no-dev --optimize-autoloader; php artisan migrate --force"
fi