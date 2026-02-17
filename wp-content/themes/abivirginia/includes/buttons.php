			   <?php if ( isset( $buttons[0]['button']['label'] ) && isset( $buttons[0]['button']['url'] ) ): ?>
                    <div class="columns">
                        <div class="column buttons mt-4 <?php echo $align_class; ?>">
                            <a class="button is-primary" href="<?php echo $buttons[0]['button']['url']; ?>"><?php if ( ! empty( $buttons[0]['button']['icon'] ) && $buttons[0]['button']['icon_location'] === 'Left' ): ?><span class="icon is-small mr-1"><i class="fas <?php echo $buttons[0]['button']['icon']; ?>"></i></span><?php endif; ?><?php echo $buttons[0]['button']['label']; ?><?php if ( ! empty( $buttons[0]['button']['icon'] ) && $buttons[0]['button']['icon_location'] === 'Right' ): ?><span class="icon is-small ml-1"><i class="fas <?php echo $buttons[0]['button']['icon']; ?>"></i></span><?php endif; ?></a>
                            <?php if ( isset( $buttons[1]['button']['label'] ) && isset( $buttons[1]['button']['url'] ) ): ?>
                                <a class="button is-light" href="<?php echo $buttons[1]['button']['url']; ?>"><?php if ( ! empty( $buttons[1]['button']['icon'] ) && $buttons[1]['button']['icon_location'] === 'Left' ): ?><span class="icon is-small mr-1"><i class="fas <?php echo $buttons[1]['button']['icon']; ?>"></i></span><?php endif; ?><?php echo $buttons[1]['button']['label']; ?><?php if ( ! empty( $buttons[1]['button']['icon'] ) && $buttons[1]['button']['icon_location'] === 'Right' ): ?><span class="icon is-small ml-1"><i class="fas <?php echo $buttons[1]['button']['icon']; ?>"></i></span><?php endif; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
				<?php endif; ?>
