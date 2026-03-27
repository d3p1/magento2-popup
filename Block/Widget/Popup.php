<?php
/**
 * @description Popup widget block
 * @author      C. M. de Picciotto <d3p1@d3p1.dev> (https://d3p1.dev/)
 */
namespace Bina\Popup\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Cms\Block\Widget\Block;

class Popup extends Block implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'Bina_Popup::widget/popup.phtml';

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData('title');
    }

    /**
     * Set title
     *
     * @param  string $title
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData('title', $title);
    }

    /**
     * Get block ID
     *
     * @return string|int
     */
    public function getBlockId()
    {
        return $this->getData('block_id');
    }

    /**
     * Set block ID
     *
     * @param  string|int $blockId
     * @return $this
     */
    public function setBlockId($blockId)
    {
        return $this->setData('block_id', $blockId);
    }

    /**
     * Get CSS class
     *
     * @return string
     */
    public function getCssClass()
    {
        return $this->getData('css_class');
    }

    /**
     * Set CSS class
     *
     * @param  string $cssClass
     * @return $this
     */
    public function setCssClass($cssClass)
    {
        return $this->setData('css_class', $cssClass);
    }

    /**
     * Get show on init
     *
     * @return bool
     */
    public function getShowOnInit()
    {
        return $this->getData('show_on_init');
    }

    /**
     * Set show on init
     *
     * @param  bool $showOnInit
     * @return $this
     */
    public function setShowOnInit($showOnInit)
    {
        return $this->setData('show_on_init', $showOnInit);
    }

    /**
     * Get button title
     *
     * @return string|null
     * @note   The button is only shown if the popup
     *         is not shown on page initialization (because, in this case,
     *         the popup is shown on button click)
     */
    public function getButtonTitle()
    {
        return $this->getData('button_title');
    }

    /**
     * Set button title
     *
     * @param  string $buttonTitle
     * @return $this
     * @note   The button is only shown if the popup is not
     *         shown on page initialization (because, in this case,
     *         the popup is shown on button click)
     */
    public function setButtonTitle($buttonTitle)
    {
        return $this->setData('button_title', $buttonTitle);
    }

    /**
     * Get button ID
     *
     * @return string
     * @note   The button is only shown if the popup is not shown
     *         on page initialization (because, in this case,
     *         the popup is shown on button click)
     */
    public function getButtonId()
    {
        if (!$this->getData('button_id')) {
            /**
             * @note If button ID is not set then generate a unique button ID
             */
            $buttonId = sprintf('popup_button_%s', uniqid());
            $this->setButtonId($buttonId);
        }

        return $this->getData('button_id');
    }

    /**
     * Set button ID
     *
     * @param  string $buttonId
     * @return $this
     * @note   The button is only shown if the popup is not
     *         shown on page initialization (because, in this case,
     *         the popup is shown on button click)
     */
    public function setButtonId($buttonId)
    {
        return $this->setData('button_id', $buttonId);
    }

    /**
     * Get element ID
     *
     * @return string
     */
    public function getElementId()
    {
        if (!$this->getData('element_id')) {
            /**
             * @note If element ID is not set then generate a unique element ID
             */
            $elementId = sprintf('popup_%s', uniqid());
            $this->setElementId($elementId);
        }

        return $this->getData('element_id');
    }

    /**
     * Set element ID
     *
     * @param  string $elementId
     * @return $this
     */
    public function setElementId($elementId)
    {
        return $this->setData('element_id', $elementId);
    }

    /**
     * Get custom content HTML
     *
     * @return string|null
     */
    public function getCustomContentHtml()
    {
        return $this->getData('custom_content_html');
    }

    /**
     * Set custom content HTML
     *
     * @param  string $customContentHtml
     * @return $this
     */
    public function setCustomContentHtml($customContentHtml)
    {
        return $this->setData('custom_content_html', $customContentHtml);
    }

    /**
     * Get content HTML
     *
     * @return string
     */
    public function getContentHtml()
    {
        if ($customHtml = $this->getCustomContentHtml()) {
            return $customHtml;
        }

        /**
         * @note Return CMS block text/HTML as content
         * @see _beforeToHtml()
         */
        return $this->getText();
    }
}
