<?php

/**
 * This file is part of the miniCMS package.
 * (c) since 2005 BATMUNKH Moltov <contact@batmunkh.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D\Model;

/**
 * Comment model. comments table.
 */
class Comment extends AbstractEntity {

    /**
     * comments table iin baganuud n CommentMapper deer davhar zaaj ugnu
     */
    protected $allowedFields = array(
        'id',
        'parent_id',
        'user_id',
        'code',
        'name',
        'content',
        'date_created',
        'ip',
        'browser');

    /**
     * field info:
     *    name:       id
     *    type:       int(11) unsigned
     *    null:       NO
     *    default:
     *    extra:      auto_increment
     *    generated:  2013-12-28 07:34:15 am
     * @param $id int Comment iin id
     * @return object
     */
    public function setId($id) {
        $id = (int) $id;
        if (isset($this->fields["id"])) {
            throw new \BadMethodCallException(__("The ID has been set already."));
        }

        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException(__("The ID is invalid."));
        }$this->fields["id"] = $id;

        return $this;
    }

    /**
     * field info:
     *    name:       parent_id
     *    type:       int(11) unsigned
     *    null:       NO
     *    default:    0
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $parent_id int Content iin parent_id
     * @return object
     */
    public function setParentId($parent_id) {
        $parent_id = (int) $parent_id;

        if (!isset($parent_id) || $parent_id == "") {
            $parent_id = "0";
        }
        $this->fields["parent_id"] = $parent_id;

        return $this;
    }

    /**
     * field info:
     *    name:       lft
     *    type:       int(11) unsigned
     *    null:       NO
     *    default:    0
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $lft int Content iin lft
     * @return object
     */
    public function setLft($lft) {
        $lft = (int) $lft;

        if (!isset($lft) || $lft == "") {
            $lft = "0";
        }
        $this->fields["lft"] = $lft;

        return $this;
    }

    /**
     * field info:
     *    name:       rgt
     *    type:       int(11) unsigned
     *    null:       NO
     *    default:    0
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $rgt int Content iin rgt
     * @return object
     */
    public function setRgt($rgt) {
        $rgt = (int) $rgt;

        if (!isset($rgt) || $rgt == "") {
            $rgt = "0";
        }
        $this->fields["rgt"] = $rgt;

        return $this;
    }

    /**
     * field info:
     *    name:       depth
     *    type:       int(11) unsigned
     *    null:       NO
     *    default:    0
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $depth int Content iin depth
     * @return object
     */
    public function setDepth($depth) {
        $depth = (int) $depth;

        if (!isset($depth) || $depth == "") {
            $depth = "0";
        }
        $this->fields["depth"] = $depth;

        return $this;
    }

    /**
     * field info:
     *    name:       user_id
     *    type:       int(11)
     *    null:       NO
     *    default:    0
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $user_id int Comment iin user_id
     * @return object
     */
    public function setUserId($user_id) {
        $user_id = (int) $user_id;

        if (!isset($user_id) || $user_id == "") {
            $user_id = "0";
        }
        $this->fields["user_id"] = $user_id;

        return $this;
    }

    /**
     * field info:
     *    name:       code
     *    type:       varchar(255)
     *    null:       YES
     *    default:
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $code string Comment iin code
     * @return object
     */
    public function setCode($code) {
        $code = (string) $code;
        $this->fields["code"] = $code;

        return $this;
    }

    /**
     * field info:
     *    name:       name
     *    type:       varchar(50)
     *    null:       YES
     *    default:
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $name  Comment iin name
     * @return object
     */
    public function setName($name) {
        $name = (string) $name;
        $this->fields["name"] = $name;

        return $this;
    }

    /**
     * field info:
     *    name:       content
     *    type:       varchar(255)
     *    null:       YES
     *    default:
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $content string Comment iin content
     * @return object
     */
    public function setContent($content) {
        $content = (string) $content;
        $this->fields["content"] = $content;

        return $this;
    }

    /**
     * field info:
     *    name:       date_created
     *    type:       datetime
     *    null:       YES
     *    default:
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $date_created datetime Comment iin date_created
     * @return object
     */
    public function setDateCreated($date_created) {
        if (!isset($date_created)) {
            $date_created = \M\Carbon::now();
        }
        $this->fields["date_created"] = $date_created;

        return $this;
    }

    /**
     * field info:
     *    name:       ip
     *    type:       varchar(50)
     *    null:       YES
     *    default:
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $ip string Comment iin ip
     * @return object
     */
    public function setIp($ip) {
        $ip = (string) $ip;
        $this->fields["ip"] = $ip;

        return $this;
    }

    /**
     * field info:
     *    name:       browser
     *    type:       varchar(255)
     *    null:       YES
     *    default:
     *    extra:
     *    generated:  2013-12-28 07:34:15 am
     * @param $browser string Comment iin browser
     * @return object
     */
    public function setBrowser($browser) {
        $browser = (string) $browser;
        $this->fields["browser"] = $browser;

        return $this;
    }

}
