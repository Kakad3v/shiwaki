<?php
function gravatar_url($email)
{
    $email = md5($email);

    return "https://gravatar.com/avatar/{$email}" . http_build_query([
        's' => 60,
        'd' => 'https://pbs.twimg.com/profile_images/953000038967468033/n4Ngwvi7.jpg'
    ]);
}
