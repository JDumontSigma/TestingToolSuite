<?php
function project($state, $link)
{
    if ($state === 'Active') {
        $state = 0;
    } else {
        $state = 1;
    }

    $name = $_GET['id'];

    if (empty($name)) {
        $projects = "SELECT * FROM projects WHERE status = " . $state;
    } else {
        $projects = "SELECT * FROM projects WHERE status = '$state' AND project_lead = '" . $name . "'";
    }
    $projectResult = mysqli_query($link, $projects);
    if ($projectResult) {
        while ($data = mysqli_fetch_array($projectResult)) {
            $test   = explode(',', $data['test_inc']);
            $people = explode(',', $data['people_inc']);
            $panel  = '<div class="project_panel">';
            $panel .= '<h4>' . $data['title'] . '</h4>';
            $panel .= '<ul>';
            $panel .= '<li>Project Lead: ' . $data['project_lead'] . '</li>';
            $panel .= '<li>Start Date: ' . $data['start_date'] . '</li>';
            $panel .= '<li>Duration: ' . $data['duration'] . ' Days</li>';
            $panel .= '<li>Number of Participants: ' . $data['participants'] . '</li>';
            $panel .= '<li>Tests Involved: ';
            $panel .= '<ul>';
            foreach ($test as $option) {
                $panel .= '<li>' . $option . '</li>';
            }
            $panel .= '</ul>';
            $panel .= '</li>';
            $panel .= '<li>People Involved: ';
            $panel .= '<ul class="images">';
            foreach ($people as $person) {
                $photo      = 'SELECT * FROM team WHERE name = "' . $person . '"';
                $photoQuery = mysqli_query($link, $photo);
                if (mysqli_num_rows($photoQuery) !== 0) {
                    $photo = mysqli_fetch_array($photoQuery);
                    $panel .= '<li>';
                    $panel .= '<img alt="' . $person . '" src="./assets/img/' . $photo['profile_picture'] . '">';
                    $panel .= '</li>';
                }
            }
            $panel .= '</ul>';
            $panel .= '</li>';
            $panel .= '</ul>';
            if ($state === 1) {
                $panel .= '<a href="./result.php?id=' . $data['id'] . '"   class="arrow">';
                $panel .= '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
                $panel .= '</a>';
            } else {
                $panel .= '<a href="./participants.php?id=' . $data['id'] . '"   class="arrow">';
                $panel .= '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
                $panel .= '</a>';
            }

            $panel .= '</div>';

            echo $panel;
        }
    } else {
        echo 'Unfortunately there are no projects!';
    }
}

function projectSearch($state, $link, $search)
{

    if ($state === 'Active') {
        $state = 0;
    } else {
        $state = 1;
    }
    $name = $_GET['id'];

    $projects = "SELECT * FROM projects WHERE status = " . $state;

    $projectResult = mysqli_query($link, $projects);
    if ($projectResult) {
        while ($data = mysqli_fetch_array($projectResult)) {
            $title = strtoupper($data['title']);
            if (strpos($title, strtoupper($search)) !== false) {
                $test   = explode(',', $data['test_inc']);
                $people = explode(',', $data['people_inc']);
                $panel  = '<div class="project_panel">';
                $panel .= '<h4>' . $data['title'] . '</h4>';
                $panel .= '<ul>';
                $panel .= '<li>Project Lead: ' . $data['project_lead'] . '</li>';
                $panel .= '<li>Start Date: ' . $data['start_date'] . '</li>';
                $panel .= '<li>Duration: ' . $data['duration'] . ' Days</li>';
                $panel .= '<li>Number of Participants: ' . $data['participants'] . '</li>';
                $panel .= '<li>Tests Involved: ';
                $panel .= '<ul>';
                foreach ($test as $option) {
                    $panel .= '<li>' . $option . '</li>';
                }
                $panel .= '</ul>';
                $panel .= '</li>';
                $panel .= '<li>People Involved: ';
                $panel .= '<ul class="images">';
                foreach ($people as $person) {
                    $photo      = 'SELECT * FROM team WHERE name = "' . $person . '"';
                    $photoQuery = mysqli_query($link, $photo);
                    if (mysqli_num_rows($photoQuery) !== 0) {
                        $photo = mysqli_fetch_array($photoQuery);
                        $panel .= '<li>';
                        $panel .= '<img alt="' . $person . '" src="./assets/img/' . $photo['profile_picture'] . '">';
                        $panel .= '</li>';
                    }
                }
                $panel .= '</ul>';
                $panel .= '</li>';
                $panel .= '</ul>';
                if ($state === 1) {
                    $panel .= '<a href="./result.php?id=' . $data['id'] . '"   class="arrow">';
                    $panel .= '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
                    $panel .= '</a>';
                } else {
                    $panel .= '<a href="./participants.php?id=' . $data['id'] . '"   class="arrow">';
                    $panel .= '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
                    $panel .= '</a>';
                }
                $panel .= '</div>';
                echo $panel;
            }
        }
    }
}
?>
