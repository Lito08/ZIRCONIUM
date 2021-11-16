<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Datastream;

class Error extends \Google\Model
{
  public $details;
  public $errorTime;
  public $errorUuid;
  public $message;
  public $reason;

  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setErrorTime($errorTime)
  {
    $this->errorTime = $errorTime;
  }
  public function getErrorTime()
  {
    return $this->errorTime;
  }
  public function setErrorUuid($errorUuid)
  {
    $this->errorUuid = $errorUuid;
  }
  public function getErrorUuid()
  {
    return $this->errorUuid;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Error::class, 'Google_Service_Datastream_Error');