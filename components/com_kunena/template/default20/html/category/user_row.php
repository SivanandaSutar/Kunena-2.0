<?php
/**
 * Kunena Component
 * @package Kunena.Template.Default20
 * @subpackage Category
 *
 * @copyright (C) 2008 - 2011 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>
					<li class="kcategory-row [K=ROW:krow-]">
						<table summary="List of all forum categories">
							<tbody>
								<tr>
									<td class="kcategory-body">
										<ul>
											<li class="kpost-title">
												<h3><?php echo $this->getCategoryLink($this->category) ?></h3>
												<div class="clr"></div>
											</li>
										</ul>
									</td>
									<td class="kcategory-topics">
										<span class="kcategory-views-number"><?php echo $this->formatLargeNumber ( $this->category->numTopics );?></span>
										<span class="kcategory-views"> <?php echo JText::_('COM_KUNENA_DISCUSSIONS'); ?> </span>
									</td>

									<td class="kcategory-posts">
										<span class="kcategory-views-number"><?php echo $this->formatLargeNumber ( $this->category->numPosts ); ?></span>
										<span class="kcategory-views"> <?php echo JText::_('COM_KUNENA_MY_POSTS'); ?> </span>
									</td>
									<?php
									$last = $this->category->getLastTopic();
									if ($last->exists()) : ?>
									<td class="kcategory-topic">
										<ul>
										<?php
										if ($this->config->avataroncat > 0) :
											$useravatar = KunenaFactory::getUser((int)$last->last_post_userid)->getAvatarImage('klist-avatar', 'list');
											if ($useravatar) : ?>
										<li class="klatest-avatar"> <?php echo $last->getLastPostauthor()->getLink( $useravatar ); ?></li>
										<?php endif; ?>
										<?php endif; ?>
										<li class="ktopic-title">
										<?php echo JText::_('COM_KUNENA_GEN_LAST_POST') . ': '. $this->getLastPostLink($this->category) ?>
										</li>

										<li class="ktopic-details">
										<?php
											echo JText::_('COM_KUNENA_BY') . ' ';
											echo $last->getLastPostauthor()->getLink( );
											echo KunenaDate::getInstance($last->last_post_time)->toSpan('config_post_dateformat','config_post_dateformat_hover');
										?>
										</li>
										</ul>
									</td>

									<?php else : ?>
									<td class="kcol-mid kcol-knoposts"><?php echo JText::_('COM_KUNENA_NO_POSTS'); ?></td>
									<?php endif ?>
									<td class="kcategory-actions">
										<?php echo CKunenaLink::GetCategoryActionLink ( 'unsubscribe', $this->category->id, JText::_('COM_KUNENA_BUTTON_UNSUBSCRIBE_CATEGORY'), 'nofollow', '', JText::_('COM_KUNENA_BUTTON_UNSUBSCRIBE_CATEGORY_LONG'), '&userid='.$this->me->userid ); ?>
									</td>
								</tr>
							</tbody>
						</table>
					</li>