@ECHO OFF
CLS
ECHO Preparing
START /B /WAIT CMD /c timeout 5
START /B /WAIT CMD /c COPY .env.example .env
echo Clean .env file created
START /B /WAIT CMD /c composer install
START /B /WAIT CMD /c npm install
echo Composer and NPM dependencies installed
START /B /WAIT CMD /c php artisan cache:clear
echo Cache deleted
START /B /WAIT CMD /C php artisan key:generate
echo New key generated
START /B /WAIT CMD /C php artisan route:clear
echo Route list cleared
START /B /WAIT CMD /c php artisan migrate:fresh
echo Migration and seeding finished
START /B /WAIT CMD /C php artisan storage:link
echo Public storage linked
echo Now you can go ahead and run 'php artisan serve'
