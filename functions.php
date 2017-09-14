<?php

namespace LonelyPlanet\UserJobTitle;

const JOB_TITLE_META_KEY = 'job_title';

/**
 * Add the job title field to the user profile
 *
 * @param  object $user
 */
function jobTitleAuthorField( $user )
{
?>
    <h3>Job Title</h3>

    <table class="form-table">
        <tr>
            <th>
                <label for"<?php echo JOB_TITLE_META_KEY; ?>">What is your job title?</label>
            </th>
            <td>
                <input
                    type="text"
                    class="regular-text"
                    name="<?php echo JOB_TITLE_META_KEY; ?>"
                    id="<?php echo JOB_TITLE_META_KEY; ?>"
                    value="<?php echo \esc_attr( \get_the_author_meta( JOB_TITLE_META_KEY, $user->ID ) ); ?>"
                />
            </td>
        </tr>
    </table>
<?php
}

/**
 * Save job title to user meta
 *
 * @param  int $user_id
 */
function saveAuthorFields( $user_id )
{
    if ( ! \current_user_can( 'edit_user', $user_id ) ) {
        return;
    }

    $job_title = filter_input( INPUT_POST, JOB_TITLE_META_KEY );

    if ( $job_title ) {
        \update_user_meta( $user_id, JOB_TITLE_META_KEY, $job_title );
    } else {
        \delete_user_meta( $user_id, JOB_TITLE_META_KEY );
    }
}
