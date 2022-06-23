<?php

declare(strict_types=1);

namespace Ruga\Dialog;

use Ruga\Dialog\Buttons\ButtonInterface;

class DialogOptions implements DialogOptionsInterface, \JsonSerializable
{
    public function __construct()
    {
        $this->position = new \Laminas\Json\Expr('{ my: "center", at: "center", of: window }');
    }
    
    
    
    /**
     * Which element the dialog (and overlay, if modal) should be appended to.
     *
     * @var string|null
     * @see https://api.jqueryui.com/dialog/#option-appendTo
     */
    private ?string $appendTo = 'body';
    
    /**
     * If set to true, the dialog will automatically open upon initialization. If false, the dialog will stay hidden
     * until the open() method is called.
     *
     * @var bool
     * @see https://api.jqueryui.com/dialog/#option-autoOpen
     */
    private bool $autoOpen = true;
    
    /**
     * Specifies which buttons should be displayed on the dialog. The context of the callback is the dialog element; if
     * you need access to the button, it is available as the target of the event object.
     *
     * @var null|array|\Laminas\Json\Expr
     * @see https://api.jqueryui.com/dialog/#option-buttons
     */
    private $buttons = [];
    
    /**
     * Specify additional classes to add to the widget's elements. Any of classes specified in the Theming section can
     * be used as keys to override their value.
     *
     * @var null|array|\Laminas\Json\Expr
     * @see https://api.jqueryui.com/dialog/#option-classes
     */
    private $classes = null;
    
    /**
     * Specifies whether the dialog should close when it has focus and the user presses the escape (ESC) key.
     *
     * @var bool
     * @see https://api.jqueryui.com/dialog/#option-closeOnEscape
     */
    private bool $closeOnEscape = true;
    
    /**
     * Specifies the text for the close button. Note that the close text is visibly hidden when using a standard theme.
     *
     * @var string|null
     * @see https://api.jqueryui.com/dialog/#option-closeText
     */
    private ?string $closeText = null;
    
    /**
     * The specified class name(s) will be added to the dialog, for additional theming.
     *
     * @var null|string
     * @see https://api.jqueryui.com/dialog/#option-dialogClass
     */
    private ?string $dialogClass = null;
    
    
    /**
     * If set to true, the dialog will be draggable by the title bar. Requires the jQuery UI Draggable widget to be
     * included.
     *
     * @var bool
     * @see https://api.jqueryui.com/dialog/#option-draggable
     */
    private bool $draggable = true;
    
    /**
     * The height of the dialog.
     *
     * @var null|int|string
     * @see https://api.jqueryui.com/dialog/#option-height
     */
    private $height = 'auto';
    
    /**
     * If and how to animate the hiding of the dialog.
     *
     * @var null|bool|int|string|array|\Laminas\Json\Expr
     * @see https://api.jqueryui.com/dialog/#option-hide
     */
    private $hide = null;
    
    /**
     * The maximum height to which the dialog can be resized, in pixels.
     *
     * @see https://api.jqueryui.com/dialog/#option-maxHeight
     */
    private ?int $maxHeight = null;
    
    /**
     * The maximum width to which the dialog can be resized, in pixels.
     *
     * @see https://api.jqueryui.com/dialog/#option-maxWidth
     */
    private ?int $maxWidth = null;
    
    /**
     * The minimum height to which the dialog can be resized, in pixels.
     *
     * @see https://api.jqueryui.com/dialog/#option-minHeight
     */
    private ?int $minHeight = 150;
    
    
    /**
     * The minimum width to which the dialog can be resized, in pixels.
     *
     * @see https://api.jqueryui.com/dialog/#option-minWidth
     */
    private ?int $minWidth = 150;
    
    /**
     * If set to true, the dialog will have modal behavior; other items on the page will be disabled, i.e., cannot be
     * interacted with. Modal dialogs create an overlay below the dialog but above other page elements.
     *
     * @see https://api.jqueryui.com/dialog/#option-modal
     */
    private bool $modal = false;
    
    /**
     * Specifies where the dialog should be displayed when opened. The dialog will handle collisions such that as much
     * of the dialog is visible as possible.
     *
     * @var null|\Laminas\Json\Expr
     * @see https://api.jqueryui.com/dialog/#option-position
     */
    private ?\Laminas\Json\Expr $position = null;
    
    /**
     * If set to true, the dialog will be resizable. Requires the jQuery UI Resizable widget to be included.
     *
     * @see https://api.jqueryui.com/dialog/#option-resizable
     */
    private bool $resizable = true;
    
    /**
     * If and how to animate the showing of the dialog.
     *
     * @var null|bool|int|string|array|\Laminas\Json\Expr
     * @see https://api.jqueryui.com/dialog/#option-show
     */
    private $show = null;
    
    /**
     * Specifies the title of the dialog. If the value is null, the title attribute on the dialog source element will
     * be used.
     *
     * @see https://api.jqueryui.com/dialog/#option-title
     */
    private ?string $title = null;
    
    /**
     * The width of the dialog, in pixels.
     *
     * @see https://api.jqueryui.com/dialog/#option-width
     * @var int|null
     */
    private ?int $width = 300;
    
    
    /**
     * Triggered when a dialog is about to close. If canceled, the dialog will not close.
     * beforeClose( event, ui )
     * Type: dialogbeforeclose
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-beforeClose
     */
    private ?\Laminas\Json\Expr $beforeClose = null;
    
    /**
     * Triggered when the dialog is closed.
     * close( event, ui )
     * Type: dialogclose
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-close
     */
    private ?\Laminas\Json\Expr $close = null;
    
    /**
     * Triggered when the dialog is created.
     * create( event, ui )
     * Type: dialogcreate
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-create
     */
    private ?\Laminas\Json\Expr $create = null;
    
    /**
     * Triggered while the dialog is being dragged.
     * drag( event, ui )
     * Type: dialogdrag
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-drag
     */
    private ?\Laminas\Json\Expr $drag = null;
    
    /**
     * Triggered when the user starts dragging the dialog.
     * dragStart( event, ui )
     * Type: dialogdragstart
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-dragStart
     */
    private ?\Laminas\Json\Expr $dragStart = null;
    
    /**
     * Triggered after the dialog has been dragged.
     * dragStop( event, ui )
     * Type: dialogdragstop
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-dragStop
     */
    private ?\Laminas\Json\Expr $dragStop = null;
    
    /**
     * Triggered when the dialog gains focus.
     * focus( event, ui )
     * Type: dialogfocus
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-focus
     */
    private ?\Laminas\Json\Expr $focus = null;
    
    /**
     * Triggered when the dialog is opened.
     * open( event, ui )
     * Type: dialogopen
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-open
     */
    private ?\Laminas\Json\Expr $open = null;
    
    /**
     * Triggered while the dialog is being resized.
     * resize( event, ui )
     * Type: dialogresize
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-resize
     */
    private ?\Laminas\Json\Expr $resize = null;
    
    /**
     * Triggered when the user starts resizing the dialog.
     * resizeStart( event, ui )
     * Type: dialogresizestart
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-resizeStart
     */
    private ?\Laminas\Json\Expr $resizeStart = null;
    
    /**
     * Triggered after the dialog has been resized.
     * resizeStop( event, ui )
     * Type: dialogresizestop
     *
     * @var \Laminas\Json\Expr|null
     * @see https://api.jqueryui.com/dialog/#event-resizeStop
     */
    private ?\Laminas\Json\Expr $resizeStop = null;
    
    
    private ?string $ajaxUrl = null;
    private string $ajaxMethod = 'GET';
    private string $ajaxRequestLayout = 'layout::ruga-dialog';
    private string $ajaxLoadingHtml = '...';
    
    
    
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    
    
    public function setAutoOpen(bool $autoOpen): self
    {
        $this->autoOpen = $autoOpen;
        return $this;
    }
    
    
    
    public function setAjaxUrl(string $ajaxUrl): self
    {
        $this->ajaxUrl = $ajaxUrl;
        return $this;
    }
    
    
    
    public function getAjaxUrl(): ?string
    {
        return $this->ajaxUrl;
    }
    
    
    
    public function setAjaxRequestLayout(string $ajaxRequestLayout): self
    {
        $this->ajaxRequestLayout = $ajaxRequestLayout;
        return $this;
    }
    
    
    
    public function getAjaxRequestLayout(): string
    {
        return $this->ajaxRequestLayout;
    }
    
    
    
    public function addButton(ButtonInterface $button): self
    {
        $this->buttons[] = $button;
        return $this;
    }
    
    
    
    /**
     * Return all the non-null properties as an object.
     *
     * @return \stdClass
     */
    public function getOptionsObject(): \stdClass
    {
        $options = [];
        
        $options = array_filter(
            get_object_vars($this),
            function ($value) {
                return $value !== null;
            }
        );
        return (object)($options);
    }
    
    
    
    public function jsonSerialize()
    {
        return $this->getOptionsObject();
    }
    
    
    
    /**
     * Return all the non-null properties as a JSON string.
     *
     * @return \stdClass
     */
    public function getOptionsJson(): string
    {
        return \Laminas\Json\Json::encode(
            $this->getOptionsObject(),
            false,
            ['enableJsonExprFinder' => true, 'prettyPrint' => true]
        );
    }
    
    
}